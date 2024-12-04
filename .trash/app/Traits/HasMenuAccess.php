<?php

namespace App\Traits;

trait HasMenuAccess
{
    public function hasMenuAccess($menu)
    {
        // Implementasi logika untuk memeriksa akses menu
        // Contoh sederhana, sesuaikan dengan kebutuhan Anda:
        return in_array($menu, $this->menu_access ?? []);
    }

    public function isAdmin()
    {
        // Implementasi logika untuk memeriksa apakah user adalah admin
        // Contoh sederhana:
        return $this->role === 'admin';
    }
}