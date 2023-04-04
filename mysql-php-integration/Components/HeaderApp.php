<style>
    header {
        display: flex;
    }

    header nav {
        display: flex;
        gap: 10px;
        flex-direction: row;
        flex-wrap: wrap;
    }
    header nav a {
        color: red;
        text-decoration: none;
        transition: .5s;
    }

    header nav a:hover {
        text-decoration: underline;
        color: dodgerblue;
    }
</style>
<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="select.php">Select</a>
        <a href="insert.php">Insert</a>
        <a href="update.php">Update</a>
        <a href="delete.php">Delete</a>
    </nav>
</header>