<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use function uploadImage;

class PageController extends Controller
{
    use APITrait;
    public function index()
    {
        $pages = Page::all();
        return $this->sendSuccess('Pages Found', compact('pages'));
    }

    public function store(Request $request)
    { {
            $request->validate([
                'name' => 'required|string|max:200',
                'header_style' => 'in:transparent,normal',
                'status' => 'in:publish,draft',
                'seo_title' => 'requiredIf:searchable,1|max:200',
                'seo_description' => 'requiredIf:searchable,1',
            ]);

            if ($request->file('logo')) {
                $logo = uploadImage($request->file('logo'), 'page-photos');
            }
            if ($request->file('featured_image')) {
                $featured_image = uploadImage($request->file('featured_image'), 'page-photos');
            }
            if ($request->file('seo_image')) {
                $seo_image = uploadImage($request->file('seo_image'), 'page-photos');
            }
            if ($request->file('facebook_image')) {
                $facebook_image = uploadImage($request->file('facebook_image'), 'page-photos');
            }
            if ($request->file('twitter_image')) {
                $twitter_image = uploadImage($request->file('twitter_image'), 'page-photos');
            }


            $page = Page::create([
                'name' => $request->name,
                'content' => $request->get('content'),
                'searchable' => $request->searchable ?? 0,
                'header_style' => $request->header_style,
                'logo' => asset($logo) ?? null,
                'featured_image' => $featured_image ?? null,
                'status' => $request->status,
                'seo_title' => $request->seo_title,
                'seo_image' => asset($seo_image) ?? null,
                'seo_description' => $request->seo_description,
                'facebook_title' => $request->facebook_title,
                'facebook_image' => asset($facebook_image) ?? null,
                'facebook_description' => $request->facebook_description,
                'twitter_title' => $request->twitter_title,
                'twitter_image' => asset($twitter_image) ?? null,
                'twitter_description' => $request->twitter_description,
            ]);
            return $this->sendSuccess('Page is created successfully', compact('page'), 201);
        }
    }

    public function show(string $id)
    {
        try {
            $page = Page::findorFail($id);
            return $this->sendSuccess('Page Found', compact('page'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Page not Found", [], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:200',
            'header_style' => 'in:transparent,normal',
            'status' => 'in:publish,draft',
            'seo_title' => 'requiredIf:searchable,1|max:200',
            'seo_description' => 'requiredIf:searchable,1',
        ]);

        if ($request->file('logo')) {
            $logo = uploadImage($request->file('logo'), 'page-photos');
            $page->update([
                'logo' => asset($logo)
            ]);
        }
        if ($request->file('featured_image')) {
            $featured_image = uploadImage($request->file('featured_image'), 'page-photos');
            $page->update([
                'featured_image' => asset($featured_image)
            ]);
        }
        if ($request->file('seo_image')) {
            $seo_image = uploadImage($request->file('seo_image'), 'page-photos');
            $page->update([
                'seo_image' => asset($seo_image)
            ]);
        }

        if ($request->file('facebook_image')) {
            $facebook_image = uploadImage($request->file('facebook_image'), 'page-photos');
            $page->update([
                'facebook_image' => asset($facebook_image)
            ]);
        }

        if ($request->file('twitter_image')) {
            $twitter_image = uploadImage($request->file('twitter_image'), 'page-photos');
            $page->update([
                'twitter_image' => asset($twitter_image)
            ]);
        }

        $page->update([
            'name' => $request->name,
            'content' => $request->get('content'),
            'searchable' => $request->searchable,
            'header_style' => $request->header_style,
            'status' => $request->status,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'facebook_title' => $request->facebook_title,
            'facebook_description' => $request->facebook_description,
            'twitter_title' => $request->twitter_title,
            'twitter_description' => $request->twitter_description,
        ]);
        $page->save();
        return $this->sendSuccess('Page is updated successfully.', compact('page'));
    }



    public function destroy(string $id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->delete();
            return $this->sendSuccess('Page deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Page cann't deleted.", [], 404);
        }
    }
}
