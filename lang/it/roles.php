<?php

use App\Enums\RoleEnum;

return [
	'values' => [
		RoleEnum::Admin => 'Amministratore',
		RoleEnum::User => 'Utente',
	],
	'messages' => [
		'create_success' => 'Ruolo creato con successo',
		'create_already_exists' => 'Ruolo già esistente',
		'update_success' => 'Ruolo aggiornato con successo',
		'delete_success' => 'Ruolo eliminato con successo',
	],
];
