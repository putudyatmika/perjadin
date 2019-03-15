<?php

use Illuminate\Database\Seeder;

class TabelPegawai03072019 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //delete users table records
        DB::table('pegawai')->delete();
        //insert some dummy records
        DB::table('pegawai')->insert(array(
            array('nip_baru'=>'19660219 199401 1 001','nama'=>'Suntono, SE,M.Si','tgl_lahir'=>'1966-02-19','jk'=>'1','gol'=>'43','unitkerja'=>'52000','jabatan'=>'1','flag_pengelola'=>'1','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19651231 199212 1 001','nama'=>'Ir. Lalu Supratna','tgl_lahir'=>'1965-12-31','jk'=>'1','gol'=>'42','unitkerja'=>'52510','jabatan'=>'2','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19651231 199212 2 001','nama'=>'Ir. Baiq Dewi Agustriawati','tgl_lahir'=>'1965-12-31','jk'=>'2','gol'=>'34','unitkerja'=>'52513','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19781220 200012 1 002','nama'=>'Akhmad Zammiluny, MM','tgl_lahir'=>'1978-12-20','jk'=>'1','gol'=>'41','unitkerja'=>'52511','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19641231 199401 2 001','nama'=>'Baiq Kartini, SE','tgl_lahir'=>'1964-12-31','jk'=>'2','gol'=>'34','unitkerja'=>'52515','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19751014 199401 1 001','nama'=>'Andi Guslan, SE','tgl_lahir'=>'1975-10-14','jk'=>'1','gol'=>'34','unitkerja'=>'52512','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19850920 200902 1 010','nama'=>'Indra Sasmita Utama, SST','tgl_lahir'=>'1985-09-20','jk'=>'1','gol'=>'33','unitkerja'=>'52514','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19910719 201403 1 002','nama'=>'Pande Gde Dony Gumilar, SSi','tgl_lahir'=>'1991-07-19','jk'=>'1','gol'=>'31','unitkerja'=>'52513','jabatan'=>'4','flag_pengelola'=>'3','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19850823 201003 2 001','nama'=>'Arintia Dewi Heryyanti, A.Md','tgl_lahir'=>'1985-08-23','jk'=>'2','gol'=>'23','unitkerja'=>'52513','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19820418 200112 1 004','nama'=>'Aris Wahyudi, SP, M.Ak','tgl_lahir'=>'1982-04-18','jk'=>'1','gol'=>'31','unitkerja'=>'52513','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19830121 200701 1 001','nama'=>'Muhamad Nursan','tgl_lahir'=>'1983-01-21','jk'=>'1','gol'=>'23','unitkerja'=>'52513','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19900205 201101 2 003','nama'=>'Linna Winarni, A.Md','tgl_lahir'=>'1990-02-05','jk'=>'2','gol'=>'24','unitkerja'=>'52512','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19810727 200901 1 010','nama'=>'Lalu Sudiarta Utama, S.Adm','tgl_lahir'=>'1981-07-27','jk'=>'1','gol'=>'32','unitkerja'=>'52512','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19611231 198302 2 002','nama'=>'Siti Fatimah','tgl_lahir'=>'1961-12-31','jk'=>'2','gol'=>'32','unitkerja'=>'52515','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19800807 200710 1 001','nama'=>'Sujiman','tgl_lahir'=>'1980-08-07','jk'=>'1','gol'=>'31','unitkerja'=>'52515','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19731225 201406 1 004','nama'=>'Heri Suria Wirawan','tgl_lahir'=>'1973-12-25','jk'=>'1','gol'=>'22','unitkerja'=>'52515','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19780505 200012 2 001','nama'=>'Bq Kurniawati, S.ST, M.Ak','tgl_lahir'=>'1978-05-05','jk'=>'2','gol'=>'41','unitkerja'=>'52511','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19781227 199912 1 001','nama'=>'I Putu Yudhistira, SE','tgl_lahir'=>'1978-12-27','jk'=>'1','gol'=>'32','unitkerja'=>'52511','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19850801 200801 2 005','nama'=>'Rika Verlita, SST','tgl_lahir'=>'1985-08-01','jk'=>'2','gol'=>'32','unitkerja'=>'52511','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19681231 198903 1 013','nama'=>'I Wayan Wirjan, SE','tgl_lahir'=>'1968-12-31','jk'=>'1','gol'=>'32','unitkerja'=>'52515','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19641231 200701 1 038','nama'=>'Muslimin','tgl_lahir'=>'1964-12-31','jk'=>'1','gol'=>'23','unitkerja'=>'52515','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19751231 200701 1 009','nama'=>'Rosidi','tgl_lahir'=>'1975-12-31','jk'=>'1','gol'=>'21','unitkerja'=>'52515','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19861231 200604 2 001','nama'=>'Bq. Yeni Sulistiana, S.Adm, M.Ak','tgl_lahir'=>'1986-12-31','jk'=>'2','gol'=>'31','unitkerja'=>'52515','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19810724 201101 1 011','nama'=>'Achmad Gunawan, S.Adm','tgl_lahir'=>'1981-07-24','jk'=>'1','gol'=>'31','unitkerja'=>'52514','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19850102 200902 2 004','nama'=>'Ratna Asih Wulandari, S.ST, M.Ak','tgl_lahir'=>'1985-01-02','jk'=>'1','gol'=>'32','unitkerja'=>'52514','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19830103 200604 2 002','nama'=>'Siti Mar\'atus Sa\'adah, SE, M.Ak','tgl_lahir'=>'1983-01-03','jk'=>'2','gol'=>'31','unitkerja'=>'52514','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19771225 200012 1 002','nama'=>'Arrief Chandra Setiawan S.ST, M.Si','tgl_lahir'=>'1977-12-25','jk'=>'1','gol'=>'41','unitkerja'=>'52520','jabatan'=>'2','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19811019 200312 2 002','nama'=>'Hertina Yusnissa, SST, MM','tgl_lahir'=>'1981-10-19','jk'=>'2','gol'=>'41','unitkerja'=>'52521','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19810514 200312 1 003','nama'=>'M Ikhsany Rusyda, SST, M.Si','tgl_lahir'=>'1981-05-14','jk'=>'1','gol'=>'41','unitkerja'=>'52523','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19820426 200412 2 001','nama'=>'Gusti Ketut Indradewi, SST','tgl_lahir'=>'1982-04-26','jk'=>'2','gol'=>'34','unitkerja'=>'52521','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19840517 200701 1 003','nama'=>'Amy Wardian Pratama, S.ST','tgl_lahir'=>'1984-05-17','jk'=>'2','gol'=>'34','unitkerja'=>'52522','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19610803 198203 2 001','nama'=>'Baiq Eny Sukriani','tgl_lahir'=>'1961-08-03','jk'=>'2','gol'=>'32','unitkerja'=>'52522','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19620824 198503 2 004','nama'=>'Sri Suhartini, S.Sos','tgl_lahir'=>'1962-08-24','jk'=>'2','gol'=>'34','unitkerja'=>'52521','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19780223 200012 1 002','nama'=>'Ahwan Hadi, S. ST, M.Ak','tgl_lahir'=>'1978-02-23','jk'=>'1','gol'=>'34','unitkerja'=>'52521','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19870724 200912 2 006','nama'=>'Isna Zuriatina, S.ST, MT','tgl_lahir'=>'1987-07-24','jk'=>'2','gol'=>'32','unitkerja'=>'52522','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19861023 200902 2 006','nama'=>'Yati Daryati Nurmalasari, SST','tgl_lahir'=>'1986-10-23','jk'=>'2','gol'=>'32','unitkerja'=>'52523','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19611229 198103 2 001','nama'=>'Ni Kadek Adi Madri, SE','tgl_lahir'=>'1961-12-29','jk'=>'2','gol'=>'42','unitkerja'=>'52530','jabatan'=>'2','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19641231 199401 1 002','nama'=>'Ir. Saan','tgl_lahir'=>'1964-12-31','jk'=>'1','gol'=>'34','unitkerja'=>'52533','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19650729 199103 2 001','nama'=>'Ir. Raehatul Jannah','tgl_lahir'=>'1965-07-29','jk'=>'2','gol'=>'41','unitkerja'=>'52532','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19860206 200902 2 005','nama'=>'Pepti Maya Puspita, SST','tgl_lahir'=>'1986-02-06','jk'=>'2','gol'=>'32','unitkerja'=>'52531','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19780424 199912 2 001','nama'=>'Ike Rahayu Sri, SST, MM','tgl_lahir'=>'1978-04-24','jk'=>'2','gol'=>'41','unitkerja'=>'52533','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19910706 201311 2 001','nama'=>'Medhia ratna Puja Hapsari,SST','tgl_lahir'=>'1991-07-06','jk'=>'2','gol'=>'32','unitkerja'=>'52533','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19890529 201211 2 001','nama'=>'Meta Indriyana, SST','tgl_lahir'=>'1989-05-29','jk'=>'2','gol'=>'32','unitkerja'=>'52531','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19690414 199003 2 001','nama'=>'Nurlailah','tgl_lahir'=>'1969-04-14','jk'=>'2','gol'=>'32','unitkerja'=>'52532','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19881215 201012 2 003','nama'=>'Anik Pratiwi, S.ST','tgl_lahir'=>'1988-12-15','jk'=>'2','gol'=>'32','unitkerja'=>'52531','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19840128 201101 2 008','nama'=>'Murniyati, S.Si, M.Ak','tgl_lahir'=>'1984-01-28','jk'=>'2','gol'=>'32','unitkerja'=>'52531','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19620308 198203 2 004','nama'=>'Haryani Sri Wahyuni','tgl_lahir'=>'1962-03-08','jk'=>'2','gol'=>'32','unitkerja'=>'52532','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19651015 199202 1 001','nama'=>'Ir. Lalu Putradi','tgl_lahir'=>'1965-10-15','jk'=>'1','gol'=>'42','unitkerja'=>'52540','jabatan'=>'2','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19730405 199412 2 001','nama'=>'Sri Endah Wardanti, S. ST, MM','tgl_lahir'=>'1973-04-05','jk'=>'2','gol'=>'41','unitkerja'=>'52541','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19700313 199003 1 002','nama'=>'Didik Sutarmono, SE','tgl_lahir'=>'1970-03-13','jk'=>'1','gol'=>'34','unitkerja'=>'52542','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19710603 199312 1 002','nama'=>'Tri Harjanto','tgl_lahir'=>'1971-06-03','jk'=>'1','gol'=>'34','unitkerja'=>'52543','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19810421 200212 2 004','nama'=>'Wini Widiastuti, SST, M.Sc','tgl_lahir'=>'1981-04-21','jk'=>'2','gol'=>'41','unitkerja'=>'52543','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19860614 200902 2 009','nama'=>'Nuning Primadianti, S.ST, M.Ec.Dev','tgl_lahir'=>'1986-06-14','jk'=>'2','gol'=>'32','unitkerja'=>'52543','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19651208 198603 2 001','nama'=>'Sri Sulastri','tgl_lahir'=>'1965-12-08','jk'=>'2','gol'=>'32','unitkerja'=>'52541','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19630604 198603 1 004','nama'=>'Islam Saribakti, SP','tgl_lahir'=>'1963-06-04','jk'=>'1','gol'=>'34','unitkerja'=>'52542','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19850611 200604 2 003','nama'=>'Ria Kusumawati','tgl_lahir'=>'1985-06-11','jk'=>'2','gol'=>'31','unitkerja'=>'52542','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19910523 201412 1 001','nama'=>'Nurul Islamy, SST','tgl_lahir'=>'1991-05-23','jk'=>'2','gol'=>'32','unitkerja'=>'52541','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19680817 199212 1 001','nama'=>'Ir. I Gusti Lanang Putra','tgl_lahir'=>'1968-08-17','jk'=>'1','gol'=>'42','unitkerja'=>'52550','jabatan'=>'2','flag_pengelola'=>'2','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19800505 200212 2 004','nama'=>'Yassinta Ben K, SST. M.Si','tgl_lahir'=>'1980-05-05','jk'=>'2','gol'=>'34','unitkerja'=>'52553','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19800827 200312 2 003','nama'=>'Suci Purnamawati, S.ST,MM','tgl_lahir'=>'1980-08-27','jk'=>'2','gol'=>'41','unitkerja'=>'52551','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19840521 200312 2 001','nama'=>'Rosita Fahmi','tgl_lahir'=>'1984-05-21','jk'=>'2','gol'=>'24','unitkerja'=>'52551','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19651231 199301 1 001','nama'=>'Ir. Muhamad Rifai','tgl_lahir'=>'1965-12-31','jk'=>'1','gol'=>'34','unitkerja'=>'52552','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19880831 201012 2 002','nama'=>'Ni Nyoman Ratna Puspitasari, SST','tgl_lahir'=>'1988-08-31','jk'=>'2','gol'=>'32','unitkerja'=>'52552','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19861018 200902 1 001','nama'=>'Muh. Zainuri. S.ST, M. Stat','tgl_lahir'=>'1986-10-18','jk'=>'1','gol'=>'34','unitkerja'=>'52551','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19940922 201701 2 001','nama'=>'Anisa Suciningtyas D, SST','tgl_lahir'=>'1994-09-22','jk'=>'2','gol'=>'31','unitkerja'=>'52553','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19670428 198901 1 001','nama'=>'Anang Zakaria, S.Si.','tgl_lahir'=>'1967-04-28','jk'=>'1','gol'=>'34','unitkerja'=>'52560','jabatan'=>'2','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19870815 201012 1 005','nama'=>'Chairul Fatikhin Putra, S.ST','tgl_lahir'=>'1987-08-15','jk'=>'1','gol'=>'32','unitkerja'=>'52561','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19780415 200212 1 006','nama'=>'Ahmad Sukri, S. Kom','tgl_lahir'=>'1978-04-15','jk'=>'1','gol'=>'34','unitkerja'=>'52562','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19820319 200412 1 002','nama'=>'I Putu Dyatmika, SST','tgl_lahir'=>'1982-03-19','jk'=>'1','gol'=>'34','unitkerja'=>'52563','jabatan'=>'3','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19620612 198203 2 002','nama'=>'Subaedah','tgl_lahir'=>'1962-06-12','jk'=>'2','gol'=>'32','unitkerja'=>'52563','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19831103 201101 1 008','nama'=>'Casslirais Surawan, S.Si','tgl_lahir'=>'1983-11-03','jk'=>'1','gol'=>'32','unitkerja'=>'52562','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19631225 198203 2 001','nama'=>'Tri Kadaryanti Ningtiyas, S.Sos','tgl_lahir'=>'1963-12-25','jk'=>'2','gol'=>'34','unitkerja'=>'52563','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19880824 201211 1 001','nama'=>'Muhammad Fathi, SST','tgl_lahir'=>'1988-08-24','jk'=>'1','gol'=>'32','unitkerja'=>'52561','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
            array('nip_baru'=>'19920910 201412 1 001','nama'=>'Wahyudi Septiawan, SST','tgl_lahir'=>'1992-09-10','jk'=>'1','gol'=>'31','unitkerja'=>'52563','jabatan'=>'4','flag_pengelola'=>'0','flag'=>'1','created_at'=>date('Y-m-d H:i:s')),
         ));
    }
}
