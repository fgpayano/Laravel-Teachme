<?php

/**
 * @return \App\Entities\User
 */
function currentUser()
{
	return auth()->user();
}