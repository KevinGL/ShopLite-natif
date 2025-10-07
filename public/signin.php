<?php
session_start();
include_once("./DB.php");
include_once("header.php");

if(isset($_SESSION["user"]))
{
    header("Location: products.php");
}

if(!isset($_POST["username"]) || !isset($_POST["password"]))
{?>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Connexion</h1>

            <form method="post" action="signin.php" class="space-y-5">
                <div>
                    <label for="inputEmail" class="block text-sm font-medium text-gray-700">Nom d'utilisateur</label>
                    <input type="text" name="username" id="inputEmail" 
                        class="mt-1 py-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        autocomplete="username" required autofocus>
                </div>

                <div>
                    <label for="inputPassword" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="password" id="inputPassword"
                        class="mt-1 py-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        autocomplete="current-password" required>
                </div>

                <input type="hidden" name="_csrf_token" value="">

                <button type="submit" 
                        class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                    Se connecter
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                Pas encore inscrit ?
                <a href="signup.php" class="text-blue-600 hover:underline">Créer un compte</a>
            </p>
        </div>
    </div>
<?php
}
else
{
    $sql = new SQLManagement();

    if($sql->auth())
    {
        header("Location: products.php");
    }
    else
    {
        header("Location: signin.php");
    }
}
?>