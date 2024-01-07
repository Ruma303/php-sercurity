<?php

include_once './connect.php';

//* Ruoli
enum ROLES: string {
    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case USER = 'utente';
}

//* Funzione di controllo del ruolo dell'utente
function checkUserRole($pdo, $userId, ROLES $role): bool {

    //? Preparazione della query per ottenere il ruolo dell'utente
    $stmt = $pdo->prepare("SELECT ruolo FROM utenti WHERE id = :userId");
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    $userRole = $stmt->fetchColumn();

    //* Restituisce vero se l'utente ha il ruolo richiesto
    return $userRole === $role->value;
}