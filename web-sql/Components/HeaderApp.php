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
        <a href="index.php">List everyone</a>
        <a href="insert.php">Add a person</a>
        <!-- <a href="detail.php">Person detail</a> -->
    </nav>
</header>