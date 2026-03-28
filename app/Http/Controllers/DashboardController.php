use App\Models\User;
use App\Models\Device;
use App\Models\Network;
use App\Models\Port;
use App\Models\Complaint;
use App\Models\Wifi;

Route::get('/dashboard', function () {
    $networksCount = class_exists(\App\Models\Network::class) ? \App\Models\Network::count() : 0;
    $devicesCount = class_exists(\App\Models\Device::class) ? \App\Models\Device::count() : 0;
    $portsCount = class_exists(\App\Models\Port::class) ? \App\Models\Port::count() : 0;
    $usersCount = \App\Models\User::count();
    $wifiCount = class_exists(\App\Models\Wifi::class) ? \App\Models\Wifi::count() : 0;

    $activeDevicesCount = class_exists(\App\Models\Device::class)
        ? \App\Models\Device::whereIn('status', ['نشط', 'active'])->count()
        : 0;

    $openComplaintsCount = class_exists(\App\Models\Complaint::class)
        ? \App\Models\Complaint::whereIn('status', ['جديدة', 'قيد المراجعة'])->count()
        : 0;

    $latestComplaints = class_exists(\App\Models\Complaint::class)
        ? \App\Models\Complaint::with('user')->latest()->take(5)->get()
        : collect();

    $latestDevices = class_exists(\App\Models\Device::class)
        ? \App\Models\Device::latest()->take(5)->get()
        : collect();

    $latestNetworks = class_exists(\App\Models\Network::class)
        ? \App\Models\Network::latest()->take(5)->get()
        : collect();

    $latestWifi = class_exists(\App\Models\Wifi::class)
        ? \App\Models\Wifi::latest()->take(5)->get()
        : collect();

    $latestUsers = \App\Models\User::latest()->take(5)->get();

    return view('dashboard', compact(
        'networksCount',
        'devicesCount',
        'portsCount',
        'usersCount',
        'wifiCount',
        'activeDevicesCount',
        'openComplaintsCount',
        'latestComplaints',
        'latestDevices',
        'latestNetworks',
        'latestWifi',
        'latestUsers'
    ));
})->name('dashboard');