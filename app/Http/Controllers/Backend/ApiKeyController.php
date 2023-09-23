<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiKeyRequest;

use Illuminate\Support\Str;
use App\Models\ApiKey;
use App\Models\ApiKeyIp;

use Illuminate\Http\Request;


class ApiKeyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $apiKeys = ApiKey::all();
        return view('backend.apiKeys.index', compact('apiKeys'));
    }

    public function create() {
        $random = Str::random(50);
        return view('backend.apiKeys.create', compact('random'));
    }

    public function edit(ApiKey $apiKey ) {
        return view('backend.apiKeys.edit', compact('apiKey'));
    }

    public function destroy(ApiKey $apiKey) {
        $apiKey->delete();
        return redirect()->route('api-keys.index');
    }

    public function store(ApiKeyRequest $request) {
        // console.log
        $data = $request->validate([
            'key' => ['required', 'string', 'size:50'],
            'ip_addresses' => ['nullable|array'],
            'ip_addresses.*' => ['ip'],
            'notes' => 'nullable|string',

        ]);

        $key = ApiKey::create($data);

        //Add ip addresses if it has any
        if(array_key_exists('ip_addresses', $data)) {
            foreach ($data['ip_addresses'] as &$address) {
                ApiKeyIp::create([
                    'api_key_id' => $key->id,
                    'ip' => $address
                ]);
            }
        }

        return redirect()->route('api-keys.index');
    }

    public function update(ApiKey $api_key, ApiKeyRequest $request){
        $data = $request->validate([
            'ip_addresses' => 'nullable|array',
            'ip_addresses.*' => ['ip'],
            'notes' => 'nullable|string',
        ]);
        
        $api_key->ips()->delete();
        
        //Add ip addresses if it has any
        if($data['ip_addresses'] !== null) {
            foreach ($data['ip_addresses'] as &$address) {
                ApiKeyIp::create([
                    'api_key_id' => $api_key->id,
                    'ip' => $address
                ]);
            }
        }

        $api_key->update($data);

        return redirect()->route('api-keys.index');
    }
}

