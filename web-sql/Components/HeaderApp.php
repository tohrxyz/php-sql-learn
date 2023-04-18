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
        <a href="index.php">Zoznam osob</a>
        <a href="insert.php">Pridaj osobu</a>
    </nav>
</header>