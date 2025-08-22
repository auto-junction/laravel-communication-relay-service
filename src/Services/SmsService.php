<?php

namespace AshokDevatwal\CommunicationRelay\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class SmsService
{
    protected $host;
    protected $otp_end_point;
    protected $verify_otp_end_point;
    protected $sms_end_point;
    protected $source;
    protected $api_key;

    public function __construct()
    {
        $this->host = Config::get('communication-relay-service.host', 'https://crs.farmjunction.in');
        $this->otp_end_point = Config::get('communication-relay-service.otp_end_point', '/api/send/otp');
        $this->verify_otp_end_point = Config::get('communication-relay-service.verify_otp_end_point', '/api/verify/otp');
        $this->sms_end_point = Config::get('communication-relay-service.sms_end_point', '/api/send/sms');
        $this->source = Config::get('communication-relay-service.source', 'Development');
        $this->api_key = Config::get('communication-relay-service.api_key', 'none');
    }

    /**
     * Generic sender to decide OTP or SMS
     */
    public function send(string $type, string $to, array $data = [])
    {
        if ($type === 'OTP') {
            return $this->sendOtp($to, $data['hash'] ?? null);
        } elseif ($type === 'SMS') {
            return $this->sendSms($to, $data);
        }

        throw new \InvalidArgumentException("Unsupported type: {$type}");
    }

    /**
     * Send OTP
     */
    public function sendOtp(string $mobile, ?string $hash = null)
    {
        $url = rtrim($this->host, '/') . $this->otp_end_point;

        return Http::asForm()
            ->withHeaders([
                'X-Api-Key' => $this->api_key,
                'Accept'    => 'application/json',
            ])
            ->post($url, [
                'mobile' => $mobile,
                'source' => $this->source,
                'hash'   => $hash ?? 'defaultHash',
            ])
            ->json();
    }

    /**
     * Verify OTP
     */
    public function verifyOtp(string $mobile, string $otp)
    {
        $url = rtrim($this->host, '/') . $this->verify_otp_end_point;

        return Http::asForm()
            ->withHeaders([
                'X-Api-Key' => $this->api_key,
                'Accept'    => 'application/json',
            ])
            ->post($url, [
                'mobile' => $mobile,
                'source' => $this->source,
                'otp'    => $otp,
            ])
            ->json();
    }

    /**
     * Send SMS
     */
    public function sendSms(string $mobile, array $data)
    {
        $url = rtrim($this->host, '/') . $this->sms_end_point;

        return Http::asForm()
            ->withHeaders([
                'X-Api-Key' => $this->api_key,
                'Accept'    => 'application/json',
            ])
            ->post($url, [
                'mobile'     => $mobile,
                'source'     => $this->source,
                'data'       => $data['data'] ?? '{}',
                'identifier' => $data['identifier'] ?? '',
            ])
            ->json();
    }
}
