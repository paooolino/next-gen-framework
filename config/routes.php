<?php 
/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'Homepage#show',
 * '/calendar' => 'calendar#index'
 */
$routes = [];

// public routes
$routes[] = ["GET", "/", "Homepage#show"];
$routes[] = ["GET", "/chi-siamo", "Public#chisiamo"];
$routes[] = ["GET", "/dossier-sicurezza", "Public#sicurezza"];
$routes[] = ["GET", "/dossier-ambiente", "Public#ambiente"];
$routes[] = ["GET", "/dossier-qualita", "Public#qualita"];
$routes[] = ["GET", "/news", "Public#news"];
$routes[] = ["GET", "/contatti", "Public#contatti"];
$routes[] = ["GET", "/login", "Public#login"];

// shop routes
$routes[] = ["GET", "/shop", "Shop#step1"];

// admin routes
$routes[] = ["GET", "/admin", "Admin#login"];
