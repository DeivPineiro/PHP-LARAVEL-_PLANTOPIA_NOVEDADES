<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Noticia
 *
 * @property int $noticia_id
 * @property string $titulo
 * @property string $subtitulo
 * @property string $parrafo
 * @property string|null $img
 * @property string $fecha_creacion
 * @property string $editor
 * @property int $publicado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereEditor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereFechaCreacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia wherenoticiasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereParrafo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia wherePublicado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia wheresubtitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model  // Uso news en plural porque New es palabra reservada.
{
    //use HasFactory; DESPUES LO VEMOS
    protected $table = "noticias";
    protected $primaryKey = "noticia_id";
    protected $fillable = ['titulo', 'subtitulo', 'parrafo', 'img', 'descripcion_img', 'fecha_creacion', 'editor', 'topico_id', 'publicado'];

    public function topico(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'topico_id'/*FK*/, 'topico_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'news_have_tags', 'noticia_id', 'tag_id', 'noticia_id', 'tag_id');
    }
}
