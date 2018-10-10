<?php
//test that our require functions are working.
#echo 'logic.php is loaded';

/*
 * This is the logic file for index.php; it's job is to check the
 * SESSION for results, and if available, store the results in variables we
 * can display in index.php
 */
session_start();
$hasErrors = false;

//1. get the contents of the books file.
#$booksJson = file_get_contents('books.json');

//2. dump the contents to the page to check them.
#dump($booksJson);

//3. convert the json to an array. assoc = TRUE means we get an array. FALSE would be an object.
#$books = json_decode($booksJson, TRUE);

//4. dump the contents of our new variable to the page.
#dump($books);
//4.b dump the author of the bell jar.
#dump($books['The Bell Jar']['author']);

# Get `results` data from session, if available
if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];
    $books = $results['books'];
    $searchTerm = $results['searchTerm'];
    $bookCount = $results['bookCount'];
    $caseSensitive = $results['caseSensitive'];
    $errors = $results['errors'];
    $hasErrors = $results['hasErrors'];
    # TIP: Because the key values for $results all match the variable names we set them do,
    # we could simplify the above 6 lines using PHP's extract function:
    #
    # extract($results);
    #
    # http://php.net/manual/en/function.extract.php
}
# Clear session data so our search is cleared when the page is refreshed
session_unset();

//omit the closing php tag because we only have php code in this file.