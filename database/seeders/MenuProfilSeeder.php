<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuProfilSeeder extends BaseMenuSeeder
{
    use HasMenuPermission;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cache::forget('menus');
        /**
         * @var Menu $mm
         */

        DB::transaction(function () {
            // ====== Hapus data lama ======
            $menuIds = Menu::where('url', 'profilpengguna')
                ->orWhere('url', 'like', 'profilpengguna%')
                ->pluck('id');

            if ($menuIds->isNotEmpty()) {
                // Ambil semua permission_id yang terkait
                $permissionIds = DB::table('menu_permission')
                    ->whereIn('menu_id', $menuIds)
                    ->pluck('permission_id');

                DB::statement('SET FOREIGN_KEY_CHECKS=0;');

                // Hapus role_has_permissions
                DB::table('role_has_permissions')->whereIn('permission_id', $permissionIds)->delete();

                // Hapus relasi menu_permission
                DB::table('menu_permission')->whereIn('menu_id', $menuIds)->delete();

                // Hapus permissions berdasarkan ID relasi
                DB::table('permissions')->whereIn('id', $permissionIds)->delete();

                // 🔹 Cari permissions orphan KHUSUS untuk menu ini
                $orphanPermissionIds = DB::table('permissions')
                    ->whereNotIn('id', function ($query) {
                        $query->select('permission_id')->from('menu_permission');
                    })
                    ->whereIn('name', Menu::whereIn('id', $menuIds)->pluck('url')) // exact match
                    ->pluck('id');

                if ($orphanPermissionIds->isNotEmpty()) {
                    DB::table('permissions')->whereIn('id', $orphanPermissionIds)->delete();
                }

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            $mm = Menu::firstOrCreate(['url' => 'profilpengguna'], ['name' => 'Identitas Pengguna', 'category' => 'IDENTITAS PENGGUNA', 'icon' => 'file-user']);
            $this->attachMenupermission($mm, ['read'], ['kepsek', 'guru', 'tatausaha', 'siswa']);

            $sm = $mm->subMenus()->create(['name' => 'Profil', 'url' => $mm->url . '/profil-pengguna', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read', 'update'], ['kepsek', 'guru', 'tatausaha', 'siswa']);

            $sm = $mm->subMenus()->create(['name' => 'Kata Sandi', 'url' => $mm->url . '/password-pengguna', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read', 'update'], ['kepsek', 'guru', 'tatausaha', 'siswa']);

            $sm = $mm->subMenus()->create(['name' => 'Pesan', 'url' => $mm->url . '/pesan-pengguna', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kepsek', 'guru', 'tatausaha', 'siswa']);
        });
    }
}
