<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LeasingRequest;
use App\Http\Resources\DeviceResource;
use App\Http\Resources\DeviceInformationResource;
use App\Http\Resources\FreeDeviceResource;
use App\Models\Device;
use Illuminate\Support\Str;

class DeviceController extends Controller
{

    /**
     * Register Devices
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $input = $request->all();
        $device = Device::find($input['deviceId']);
        if ($device) {
            $input['deviceAPIKey'] = Str::random(16);
            $input['deviceType'] = 'free';
            if ($input['activationCode']) {
                if ($device->where('activationCode', $input['activationCode'])) $input['deviceType'] = 'leasing';
            }
            $device->update($input);
            return $this->success(new DeviceResource($device));
        } else {
            return $this->error(302, 'Device does not exist');
        }
    }

    /**
     * Get Device Information
     *
     * @return \Illuminate\Http\Response
     */
    public function info($id)
    {
        $device = Device::find($id);
        if (!$device) return $this->error(302, 'Device does not exist');
        if (!$device->user) return $this->error(410, 'This device has not any owner');
        if ($device->deviceType == 'free') return $this->success(new FreeDeviceResource($device));
        if (count($device->leasings) == 0) return $this->error(411, 'This device has not any Leasing');
        return $this->success(new DeviceInformationResource($device));
    }


       /**
     * Update the specified device in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeasingRequest $request, $id)
    {
        $apiKey = $request->header('X-API-KEY');
        if(!$apiKey) return $this->error(305, 'API key header is missing');
        $device = Device::where('deviceAPIKey',$apiKey)->where('id',$id)->first();
        if(!$device) return $this->error(302, 'Device does not exist');
        $device->update(['deviceTraining'=>$request->input('deviceTraining')]);
        return $this->success('Success');
    }
}
