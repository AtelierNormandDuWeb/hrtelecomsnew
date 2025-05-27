<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'subtitle',
        'avatar_url',
        'background_url',
        'description',
        'details',
        'contact_info',
        'sort_order'
    ];

    protected $casts = [
        'details' => 'array',
        'contact_info' => 'array',
        'sort_order' => 'integer'
    ];

    /**
     * Scope pour ordonner les cartes
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Scope pour récupérer seulement les cartes actives (si vous ajoutez un champ status plus tard)
     */
    public function scopeActive($query)
    {
        return $query; // Pour l'instant, on retourne toutes les cartes
        // Plus tard : return $query->where('status', 'active');
    }

    /**
     * Accesseur pour details - s'assure que c'est toujours un array
     */
    public function getDetailsAttribute($value)
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return $decoded ?: [];
        }
        return $value ?: [];
    }

    /**
     * Accesseur pour contact_info - s'assure que c'est toujours un array
     */
    public function getContactInfoAttribute($value)
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return $decoded ?: [];
        }
        return $value ?: [];
    }

    /**
     * Mutateur pour s'assurer que sort_order a une valeur par défaut
     */
    public function setSortOrderAttribute($value)
    {
        $this->attributes['sort_order'] = $value ?: 0;
    }
}