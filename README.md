# Laravel Communication Relay Service

A Laravel package to handle SMS & OTP communication via a central relay service.

---

## ✅ Features

* Send OTP messages
* Verify OTP
* Send templated SMS
* Supports hashed OTP type
* Easy integration with environment-based config

---

## 📦 Installation

```bash
composer require autojunction/laravel-communication-relay-service

Install Dev Main
composer require autojunction/laravel-communication-relay-service:dev-main
```

---

## ⚙️ Environment Configuration

Add the following variables to your `.env` file:

```env
CRS_HOST=
CRS_API_KEY=
CRS_OTP_ENDPOINT=
CRS_VERIFY_OTP_ENDPOINT=
CRS_SMS_ENDPOINT=
CRS_SOURCE=
```

---

## 🚀 Usage

### Import the service

```php
use AshokDevatwal\CommunicationRelay\Services\SmsService;

$smsService = new SmsService();
```

---

### 📩 Send OTP

```php
$mobile = '911234567890';

$response = $smsService->send('OTP', $mobile);
```

---

### ✅ Verify OTP

```php
$mobile = '911234567890';
$otp = '123456';

$response = $smsService->verifyOtp($mobile, $otp);
```

---

### ✉️ Send SMS (Templated)

```php
$to = '911234567890';

$options = [
    'identifier' => 'welcome_user', // template name
    'data' => [
        'user' => 'Raj',
        'brand' => 'Mahindra',
        'model' => '575 DI'
    ],
];

$response = $smsService->send('SMS', $to, $options);
```

---

### 🔐 Send Hashed OTP (Optional)

```php
$options = [
    'hash' => 'asdftdf12345',
];

$response = $smsService->send('OTP', '911234567890', $options);
```

---

## 📄 Method Reference

| Method                           | Description                  |
| -------------------------------- | ---------------------------- |
| `send('OTP', $mobile)`           | Send OTP                     |
| `send('SMS', $mobile, $options)` | Send Template SMS            |
| `verifyOtp($mobile, $otp)`       | Verify OTP                   |

---

## ❗ Notes

* Ensure you configure `.env` values correctly
* `$options['data']` must match variables used in your SMS template
* `$options['identifier']` is required for SMS type only

---

## 👨‍💻 Author

**Ashok Devatwal**

---
