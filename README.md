<p>
    <h3>Installation steps</h3>
    <ul>
        <li>Clone repository and checkout to master</li>
        <li>Navigate to product folder</li>
        <li>Copy the .env.example and rename to .env</li>
        <li>Update DB credentials on env file</li>
        <li>Run composer install for adding vendor packages</li>
        <li>Run command <b>php artisan migrate</b> to create table</li>
        <li>Run command <b>php artisan db:seed</b> to Add first auth token, sample words and synonyms into table</li>
        <li>Run command <b>php artisan serve</b> to start application</li>
    </ul>
</p>
