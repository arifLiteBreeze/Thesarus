
<template>
    <div>
        <div class="mt-5">
            <h3>
            StarWeb - Thesaurus <br>
            <small class="text-muted">Synonyms Collections</small>
            </h3>
        </div>
        <div class="mt-5">
            <vue-typeahead-bootstrap
            class="mb-4"
            v-model="query"
            :data="results"
            @keydown.enter="search"
            :serializer="item => item.word"
            placeholder="Enter your word"
            prepend="SYNONYMS : "
            @input="searchWord"
            @keyup.enter="handleEnter"
            >
            <template slot="append">
                <button  class="btn btn-primary" @click="findSynonyms">
                <i class="fas fa-search"></i>
                </button>
            </template>
            </vue-typeahead-bootstrap>
            <template>
                <div class="search-error" v-if="searchWordError.trim() != ''">
                    {{searchWordError}}
                </div>
            </template>
            <template>
                <div class="search-results">
                    <div v-if="resultFoundStatus.trim() != ''">
                        <div v-html="resultFoundStatus" class="alert alert-success" role="alert">
                            {{resultFoundStatus}}
                        </div>
                    </div>
                    <tabs id="v-for-object" :options="{ useUrlFragment: false }" @clicked="tabClicked" @changed="tabChanged">
                        <div v-for="synonym in synonyms" :key="synonym.id">
                            <tab :name="synonym.meaning" :id="synonym.id">
                                <div class="tabbedItemContainer">
                                    <ul>
                                        <li v-for="synonymsWord in synonym.synonyms" :key="synonymsWord" @click="suggestedWordSynonyms(synonymsWord)" v-tooltip="'Click to view synonyms'">
                                            {{synonymsWord}}
                                        </li>
                                    </ul>
                                </div>
                            </tab>
                        </div>
                    </tabs>
                </div>
            </template>
            <template>
                <div class="related-word-container">
                    <div v-if="relatedWords.length">
                        <div class="alert alert-secondary" role="alert">
                            Related Words
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        <li class="btn btn-success float-left p-2 m-1" 
                        v-for="relatedWord in relatedWords" 
                        :key="relatedWord.id"
                        @click="suggestedWordSynonyms(relatedWord.word)">
                                {{relatedWord.word}}
                        </li>
                    </ul>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
    import {debounce} from 'lodash';
    export default {
    data(){
        return {
        query: '',
        userRepositories: {},
        results: [],
        synonyms:[],
        relatedWords: [],
        resultFoundStatus: '',
        searchWordError: '',
        }
    },

    methods: {
        handleEnter: function(event){
            this.findSynonyms();
        },
        searchWord: debounce(function() {
            axios.get('/api/words',{params: {word: this.query}})
            .then(response => {
                this.results = response.data.data;
            })           
        }, 500),
        findSynonyms: debounce(function() {
            axios.get('/api/synonyms',{params: {word: this.query}})
            .then(response => {
                this.synonyms = response.data.data;
                this.relatedWords = response.data.relatedWords;
                if(response.data.total == 0) {
                    this.resultFoundStatus = "Sorry we can't find any synonyms for <b>" + this.query +"</b> in our system.";
                }   
                else this.resultFoundStatus = "Synonyms for <b>" + this.query +"</b> is.";
            })
            .catch(function (error) {
                var errorMessage = '';
                if(error.response && error.response.data && error.response.data.errors) {
                    for (const [key, value] of Object.entries(error.response.data.errors)) {
                        alert(value[0]);
                    }
                }
            })        
        }, 500),
        suggestedWordSynonyms: debounce(function(word) {
        this.query = word;
        this.findSynonyms();
        }, 500),
        tabClicked (selectedTab) {
            console.log('Current tab re-clicked:' + selectedTab.tab.name);
        },
        tabChanged (selectedTab) {
            console.log('Tab changed to:' + selectedTab.tab.name);
        },
    }
    }
</script>


