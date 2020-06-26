<?php

namespace Api\Providers;

interface Authenticatable {
    public function isAuthenticated() : bool;
}

?>