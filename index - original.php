<?php
require 'helpers.php';
require 'logic.php';
//Because we put helpers before logic, the helpers functions will be available within the logic file.
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>Foobooks0</title>
    <meta charset='utf-8'>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
          crossorigin='anonymous'>

    <link href='/styles/app.css' rel='stylesheet'>

</head>
<body>

<h1>Foobooks0</h1>

<?php foreach ($books as $title => $book):
//foreach (what are we moving through ($books)   as   create a "Key points to value" statement.
//$title (because that's our key) points to $book.
//instead of the {} we're using the : which is an alternate syntax we use within display files.
//the alternate syntax makes it clearer what the code is doing rather than a } after some html.
//the shortcut <?= is the same as <?php echo $title
    ?>
    <div class='book'>
        <?= $title ?> by <?= $book['author'] ?>
        <img src='<?= $book['cover_url'] ?>' alt='Cover photo for the book <?= $title ?>'>
    </div>

<?php endforeach ?>


<?php
//alternative way we could have coded the above, not using the php shortcut and liberally opening and closing php.
//not how you should do php within a display file. too much php. distracts from overall structure of page.
//Lose the indentation of html. Issues between quotes that html needs and quotes that php needs.
//This kind of code should only be used in our logic php files.
foreach ($books as $title => $book) {
    echo '<div class="book">';
    echo $title . ' by ' . $book['author'];
    echo '<img src="' . $book['cover_url'] . '" alt="Cover photo for the book ' . $title . '">';
    echo '</div>';
}
?>
</body>
</html>