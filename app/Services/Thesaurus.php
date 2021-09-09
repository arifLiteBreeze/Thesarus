<?php 
namespace App\Services;
/**
 * Interface for thesarus
 * 
 * @author Arif C A <aca@lbit.in>
 */

interface Thesaurus
{
    // Adds the given words as synonyms to each other
    public function addSynonyms(object $synonyms);

    // Returns an array with all the synonyms for a word
    public function getSynonyms(string $word): object;
    
    // Returns an array with all words that are stored in the thesaurus
    public function getWords(object $relatedWords):object;
}