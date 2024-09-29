<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\VendorController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
// Routes pour les utilisateurs

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/register', [UserController::class, 'register']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);
Route::post('/reset-password', [UserController::class, 'resetPassword']);
Route::post('/login', [UserController::class, 'login']);

// Routes pour les produits
Route::get('products', [ProductController::class, 'index']);          // Liste des produits
Route::post('products', [ProductController::class, 'store']);         // Créer un nouveau produit
Route::get('products/{product}', [ProductController::class, 'show']);     // Récupérer un produit spécifique
Route::put('products/{product}', [ProductController::class, 'update']);   // Mettre à jour un produit spécifique
Route::delete('products/{product}', [ProductController::class, 'destroy']); // Supprimer un produit spécifique

// Routes pour les transactions
Route::get('transactions', [TransactionController::class, 'index']);          // Liste des transactions
Route::post('transactions', [TransactionController::class, 'store']);         // Créer une nouvelle transaction
Route::get('transactions/{transaction}', [TransactionController::class, 'show']);     // Récupérer une transaction spécifique
Route::put('transactions/{transaction}', [TransactionController::class, 'update']);   // Mettre à jour une transaction spécifique
Route::delete('transactions/{transaction}', [TransactionController::class, 'destroy']); // Supprimer une transaction spécifique

// Routes pour les abonnements
Route::get('subscriptions', [SubscriptionController::class, 'index']);          // Liste des abonnements
Route::post('subscriptions', [SubscriptionController::class, 'store']);         // Créer un nouvel abonnement
Route::get('subscriptions/{subscription}', [SubscriptionController::class, 'show']);     // Récupérer un abonnement spécifique
Route::put('subscriptions/{subscription}', [SubscriptionController::class, 'update']);   // Mettre à jour un abonnement spécifique
Route::delete('subscriptions/{subscription}', [SubscriptionController::class, 'destroy']); // Supprimer un abonnement spécifique

// Routes pour les commandes
Route::get('orders', [OrderController::class, 'index']);          // Liste des commandes
Route::post('orders', [OrderController::class, 'store']);         // Créer une nouvelle commande
Route::get('orders/{order}', [OrderController::class, 'show']);     // Récupérer une commande spécifique
// Route::put('orders/{order}', [OrderController::cPlass, 'update']);   // Mettre à jour une commande spécifique
Route::delete('orders/{order}', [OrderController::class, 'destroy']); // Supprimer une commande spécifique

// Routes pour les vendeurs
Route::get('vendors', [VendorController::class, 'index']);          // Liste des vendeurs
Route::post('vendors', [VendorController::class, 'store']);         // Créer un nouveau vendeur
Route::get('vendors/{vendor}', [VendorController::class, 'show']);     // Récupérer un vendeur spécifique
Route::put('vendors/{vendor}', [VendorController::class, 'update']);   // Mettre à jour un vendeur spécifique
Route::delete('vendors/{vendor}', [VendorController::class, 'destroy']); // Supprimer un vendeur spécifique

// Routes pour l'authentification
Route::post('auth/login', [AuthController::class, 'login']);    // Authentifier un utilisateur
Route::post('auth/register', [AuthController::class, 'register']); // Enregistrer un nouvel utilisateur
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum'); // Déconnexion de l'utilisateur
// Routes pour les categories

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);