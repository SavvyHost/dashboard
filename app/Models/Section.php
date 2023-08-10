<?php

namespace App\Models;

use App\CMS\Sections\SectionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $casts = [
        'data' => 'json',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class)->using(PageSection::class)->withPivot(['id', 'data'])->orderBy('page_section.id');
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function getBodyAttribute()
    {
        $template_body = $this->template->body;
        $template_parameters = $this->template->parameters;
        $values = json_decode($this->values);

        foreach (json_decode($template_parameters) as $parameter) {
            $template_body = str_replace($parameter, $values->$parameter, $template_body);
        }

        return json_decode($template_body);
    }

    public function getInputsAttribute()
    {
        $factory = new SectionFactory();
        $instance = $factory->getSection($this->name);
        return $instance->getInputs();
    }

    public function getIsIterableAttribute()
    {
        $factory = new SectionFactory();
        $instance = $factory->getSection($this->name);
        return $instance->isIterable();
    }
}
