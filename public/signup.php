<?php
session_start();

require_once("header.php");
require_once("./DB.php");

if(isset($_SESSION["user"]))
{
    header("Location: products.php");
}

if(!isset($_POST["username"]))
{?>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8">
            
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Créer un compte</h1>

            <form action="signup.php" method="post" class="space-y-5">

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom d'utilisateur</label>
                    <input type="text" name="username" class="mt-1 py-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                    <input type="text" name="email" class="mt-1 py-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Adresse postale</label>
                    <input type="text" name="address" class="mt-1 py-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Code postal</label>
                        <input type="text" name="zipCode" class="mt-1 py-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ville</label>
                        <input type="text" name="city" class="mt-1 py-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="text" name="phoneNumber" class="mt-1 py-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="plainPassword" class="mt-1 py-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                </div>

                <button type="submit" 
                        class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                    S'inscrire
                </button>

            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                Déjà inscrit ?
                <a href="signin.php" class="text-blue-600 hover:underline">Se connecter</a>
            </p>
        </div>
    </div>
<?php
}
else
{
    $sql = new SQLManagement();

    $sql->registry();
    
    header("Location: ./products.php");
}