<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<!DOCTYPE html>
<html>
    <?php
        include_once("header.php");
    ?>
    <body class="bg-gray-100 min-h-screen">
        <!--{% include("navbar.html.twig") %}-->

        <?php if(isset($_SESSION["FLASH_MESSAGE"]))
        {?>
            <div class="p-3 mb-2 text-center rounded-md font-medium bg-red-100 text-red-800 border border-red-300">
                <?php echo $_SESSION["FLASH_MESSAGE"]; ?>
            </div>
            <?php
            unset($_SESSION["FLASH_MESSAGE"]);
        }
        
        if(isset($_SESSION["user"]))
        {
            header("Location: products.php");
        }
        else
        {
            header("Location: signin.php");
        }
        ?>
        <div class="flex">
            <!--{% if app.user %}
                {% include("sidebar.html.twig") %}
            {% endif %}-->

            <main class="flex-1 mt-14 p-6">
                <!--{% block body %}{% endblock %}-->
            </main>
        </div>

    </body>
</html>
