<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_varian extends CI_Model
{
    private $table = 'barang_varian';

    public function get_fields_by_kategori($kategori)
    {
        $config = [
            'Handphone' => [
                'RAM'     => ['type'=>'dropdown','options'=>['6GB','8GB','12GB','16GB']],
                'Storage' => ['type'=>'dropdown','options'=>['128GB','256GB','512GB','1TB']],
                'Warna'   => ['type'=>'grouped_dropdown','groups'=>[
                    'iPhone 15 / 15 Plus'            => ['Black','Blue','Green','Pink','Yellow'],
                    'iPhone 15 Pro / Pro Max'         => ['Black Titanium','Natural Titanium','White Titanium','Blue Titanium'],
                    'iPhone 16 / 16 Plus'             => ['Black','White','Pink','Teal','Ultramarine'],
                    'iPhone 16 Pro / Pro Max'         => ['Black Titanium','Natural Titanium','White Titanium','Desert Titanium'],
                    'iPhone 17 / 17 Air'              => ['Black','White','Sage','Mist Blue','Lavender'],
                    'iPhone 17 Pro / Pro Max'         => ['Silver','Deep Blue','Cosmic Orange'],
                    'Samsung S24 / S24+'              => ['Onyx Black','Marble Gray','Cobalt Violet','Amber Yellow','Jade Green','Sapphire Blue','Sandstone Orange'],
                    'Samsung S24 Ultra'               => ['Titanium Black','Titanium Gray','Titanium Violet','Titanium Yellow','Titanium Green','Titanium Blue','Titanium Orange'],
                    'Samsung S25 / S25+'              => ['Navy','Mint','Icy Blue','Silver Shadow','Coral Red','Blue Black','Pink Gold'],
                    'Samsung S25 Ultra'               => ['Titanium Black','Titanium Gray','Titanium Silver Blue','Titanium White Silver','Titanium Jade Green','Titanium Rose Gold','Titanium Jet Black'],
                    'Samsung S26 / S26+ / S26 Ultra'  => ['Black','White','Cobalt Violet','Sky Blue','Silver Shadow','Pink Gold'],
                ]],
            ],

            'Laptop' => [
                'RAM'     => ['type'=>'dropdown','options'=>['8GB','16GB','24GB','32GB','36GB','48GB','64GB','96GB','128GB']],
                'Storage' => ['type'=>'dropdown','options'=>['256GB SSD','512GB SSD','1TB SSD','2TB SSD','4TB SSD','8TB SSD']],
                'Warna'   => ['type'=>'grouped_dropdown','groups'=>[
                    'MacBook Air M2 / M3'       => ['Midnight','Starlight','Silver','Space Gray'],
                    'MacBook Air M4 / M5'       => ['Midnight','Starlight','Silver','Sky Blue'],
                    'MacBook Pro M2'            => ['Silver','Space Gray'],
                    'MacBook Pro M3 / M4 / M5' => ['Silver','Space Black'],
                    'Asus ROG Zephyrus G16' => ['Eclipse Gray', 'Platinum White']
                ]],
            ],

            'Tablet' => [
                'RAM'     => ['type'=>'dropdown','options'=>['6GB','8GB','12GB','16GB']],
                'Storage' => ['type'=>'dropdown','options'=>['64GB','128GB','256GB','512GB','1TB','2TB']],
                'Warna'   => ['type'=>'grouped_dropdown','groups'=>[
                    'iPad Air 10.9" (M1)'   => ['Space Gray','Starlight','Pink','Purple','Blue'],
                    'iPad Air 11" (M2)'     => ['Space Gray','Starlight','Purple','Blue'],
                    'iPad Air 13" (M2)'     => ['Space Gray','Starlight','Purple','Blue'],
                    'iPad Air 11" (M3)'     => ['Space Gray','Starlight','Purple','Blue'],
                    'iPad Air 13" (M3)'     => ['Space Gray','Starlight','Purple','Blue'],
                    'iPad Pro 11" (M1)'     => ['Space Gray','Silver'],
                    'iPad Pro 12.9" (M1)'   => ['Space Gray','Silver'],
                    'iPad Pro 11" (M2)'     => ['Space Gray','Silver'],
                    'iPad Pro 12.9" (M2)'   => ['Space Gray','Silver'],
                    'iPad Pro 11" (M4)'     => ['Space Black','Silver'],
                    'iPad Pro 13" (M4)'     => ['Space Black','Silver'],
                ]],
            ],

            'TWS' => [
                'Warna' => ['type'=>'grouped_dropdown','groups'=>[
                    'AirPods / AirPods Pro' => ['White'],
                    'CMF Buds Pro 2'        => ['Dark Grey','Light Grey','Blue','Orange'],
                    'CMF Buds 2 Plus'       => ['Light Grey','blue'],
                    'CMF Buds 2'            => ['Dark Grey','Light Green','Orange'],
                    'CMF Buds 2a'           => ['Dark Grey','Light Grey','Orange'],
                    'Umum'                  => ['Black','White','Red','Green','Pink','Yellow'],
                ]],
            ],

            'Headphone' => [
                'Warna' => ['type'=>'grouped_dropdown','groups'=>[
                    'Sony WH-1000XM5'       => ['Black','Silver','Midnight Blue','Smoky Pink'],
                    'Sony WH-1000XM6'       => ['Black','Silver','Sand Pink'],
                    'AirPods Max'           => ['Midnight','Starlight','Blue','Purple','Orange'],
                    'Umum'                  => ['Black','White','Red','Green','Pink','Yellow'],
                ]],
            ],

            // ── SMARTWATCH ───────────────────────────────────────────
            'Smartwatch' => [
                'Ukuran' => ['type'=>'dropdown','options'=>[
                    '38mm','40mm','41mm','42mm','44mm','45mm','46mm','47mm','49mm',
                ]],
                'Warna'  => ['type'=>'grouped_dropdown','groups'=>[

                    // ── Apple Watch Series 9 (2023) ──────────────────
                    'Series 9 — Aluminium'        => ['Pink','Midnight','Starlight','Silver','(PRODUCT)RED'],
                    'Series 9 — Stainless Steel'  => ['Gold','Silver','Graphite'],

                    // ── Apple Watch SE 2 (2022) ──────────────────────
                    'SE 2 — Aluminium'            => ['Midnight','Starlight','Silver'],

                    // ── Apple Watch SE 3 (2025) ──────────────────────
                    'SE 3 — Aluminium'            => ['Midnight','Starlight'],

                    // Apple Watch Ultra 2
                    'Ultra 2 Natural Titanium — Ocean Band'        => ['Orange','White','Blue'],
                    'Ultra 2 Natural Titanium — Alpine Loop'       => ['Starlight','Green','Orange','Blue','Indigo','Olive','Tan','Dark Green'],
                    'Ultra 2 Natural Titanium — Trail Loop'        => ['Blue / Gray','Yellow / Beige','Black / Gray','Green / Gray','Blue / Black','Orange / Beige','Black'],
                    'Ultra 2 Natural Titanium — Titanium Milanese' => ['Natural Titanium'],
                    'Ultra 2 Black Titanium — Ocean Band'          => ['Orange','White','Blue'],
                    'Ultra 2 Black Titanium — Alpine Loop'         => ['Starlight','Green','Orange','Blue','Indigo','Olive','Tan','Dark Green'],
                    'Ultra 2 Black Titanium — Trail Loop'          => ['Blue / Gray','Yellow / Beige','Black / Gray','Green / Gray','Blue / Black','Orange / Beige','Black'],
                    'Ultra 2 Black Titanium — Titanium Milanese'   => ['Black Titanium'],

                    // Apple Watch Ultra 3
                    'Ultra 3 Natural Titanium — Ocean Band'        => ['Neon Green','Anchor Blue','Black','Orange','White','Blue'],
                    'Ultra 3 Natural Titanium — Alpine Loop'       => ['Terra Cotta','Light Blue','Black','Starlight','Green','Orange','Blue','Indigo','Olive','Tan','Dark Green'],
                    'Ultra 3 Natural Titanium — Trail Loop'        => ['Black / Charcoal','Blue / Bright Blue','Green / Neon','Blue / Gray','Yellow / Beige','Black / Gray','Green / Gray','Blue / Black','Orange / Beige'],
                    'Ultra 3 Natural Titanium — Titanium Milanese' => ['Natural Titanium'],
                    'Ultra 3 Black Titanium — Ocean Band'          => ['Neon Green','Anchor Blue','Black','Orange','White','Blue'],
                    'Ultra 3 Black Titanium — Alpine Loop'         => ['Terra Cotta','Light Blue','Black','Starlight','Green','Orange','Blue','Indigo','Olive','Tan','Dark Green'],
                    'Ultra 3 Black Titanium — Trail Loop'          => ['Black / Charcoal','Blue / Bright Blue','Green / Neon','Blue / Gray','Yellow / Beige','Black / Gray','Green / Gray','Blue / Black','Orange / Beige'],
                    'Ultra 3 Black Titanium — Titanium Milanese'   => ['Black Titanium'],

                    // ── Apple Watch Series 10 (2024) ─────────────────
                    'Series 10 — Aluminium'       => ['Jet Black','Rose Gold','Silver'],
                    'Series 10 — Titanium'        => ['Slate','Gold','Natural'],

                    // ── Apple Watch Series 11 (2025) ─────────────────
                    'Series 11 — Aluminium'       => ['Jet Black','Silver','Rose Gold','Space Gray'],
                    'Series 11 — Titanium'        => ['Natural','Gold','Slate'],

                    // Samsung Galaxy Watch
                    'Galaxy Watch 6'          => ['Graphite','Silver','Gold'],
                    'Galaxy Watch 6 Classic'  => ['Black','Silver'],
                    'Galaxy Watch 7'          => ['Green','Silver','Cream'],
                    'Galaxy Watch Ultra'      => ['Titanium Gray','Titanium Silver','Titanium White'],
                    'Galaxy Watch 8'          => ['Cosmic Black','Starlight','Sage Green'],
                    'Galaxy Watch 9'          => ['Cream','Graphite'],
                    'Galaxy Watch Ultra 2'    => ['Titanium Gray','Titanium Silver'],

                    // Huawei Watch
                    'Huawei Watch GT 4'       => ['Black','Brown Leather','Rainforest Green','Steel','White','Light Gold'],
                    'Huawei Watch 4 / 4 Pro'  => ['Black','Dark Titanium','Mars Titanium'],
                    'Huawei Watch GT 5'       => ['Black','Blue','Gold'],
                    'Huawei Watch GT 5 Pro'   => ['Titanium Silver','Ceramic White'],
                    'Huawei Watch 5 / 5 Pro'  => ['Nebula Silver','Aurora Green','Galaxy Blue','Obsidian Black'],
                    'Huawei Watch Ultimate 2' => ['Deep Sea Blue','Expedition Green','Premium Gold'],

                    // Garmin Mid-Tier
                    'Garmin Forerunner 165'   => ['Black','Turquoise','Berry','White'],
                    'Garmin Forerunner 265'   => ['Black','Whitestone','Aqua','Light Pink','Powder Grey'],
                    'Garmin Venu 3 / 3S'      => ['Whitestone','Black','Pebble Gray','Sage Gray','Dust Rose','Ivory'],
                    'Garmin Vivoactive 5'     => ['Metallic Navy','Metallic Orchid','Slate','Ivory'],
                    'Garmin Lily 2'           => ['Cream Gold','Dark Bronze','Metallic Lilac'],
                    'Garmin Instinct 2X Solar'=> ['Graphite','Flame Red','Whitestone','Moss','Coyote Tan'],
                    'Garmin Instinct 3'       => ['Tarmac Black','Coyote Tan','Olive Drab'],

                    // Garmin Flagship
                    'Garmin Forerunner 965'   => ['Black','Whitestone','Amp Yellow'],
                    'Garmin Forerunner 970'   => ['Stealth Black','Laser Yellow','Titanium Grey'],
                    'Garmin Fenix 7 Pro'      => ['Slate Gray','Titanium Carbon Gray','Titanium Slate'],
                    'Garmin Fenix 8 / 8 Pro'  => ['Slate Gray','Carbon Gray','Whitestone','Soft Gold','Orange'],
                    'Garmin Epix Pro Gen 2'   => ['Carbon Gray DLC','Titanium Silver'],
                    'Garmin Enduro 3'         => ['Carbon Gray DLC Titanium'],

                    // COROS
                    'COROS Pace 3'            => ['White','Black','Red Track','Mist','Emerald'],
                    'COROS Pace 4'            => ['Charcoal','Polar White','Speed Yellow'],
                    'COROS Pace Pro'          => ['Pitch Black','Dark Grey','Ocean Blue'],
                    'COROS Apex 2 Pro'        => ['Black','Grey','Green','Chamonix'],
                    'COROS Vertix 2S'         => ['Earth','Moon','Space'],
                    'COROS Nomad'             => ['Army Green','Chocolate Brown','Desert Tan'],
                    'COROS Apex 4'            => ['Titanium Matte','Deep Blue','Stealth Carbon'],
                ]],
            ],

            // ── SPEAKER ──────────────────────────────────────────────
            'Speaker' => [
                'Warna' => ['type'=>'grouped_dropdown','groups'=>[

                    // Harman Kardon
                    'Harman Kardon Onyx Studio 8'    => ['Black','Blue','Champagne'],
                    'Harman Kardon Onyx Studio 9'    => ['Black','Marine Blue','Charcoal Gray'],
                    'Harman Kardon Go + Play 3'      => ['Black','Gray'],
                    'Harman Kardon Luna'             => ['Black','Gray'],
                    'Harman Kardon Aura Studio 4'    => ['Black'],
                    'Harman Kardon Aura Studio 5'    => ['Black'],
                    'Harman Kardon SoundSticks 5'    => ['Clear'],

                    // JBL
                    'JBL Go 5'        => ['Black','Blue','Red','Gray','Pink','Mint','Squad'],
                    'JBL Clip 5'      => ['Black','Blue','Red','Squad','Pink','White'],
                    'JBL Flip 7'      => ['Black','Blue','Grey','Squad','Red'],
                    'JBL Charge 5'    => ['Black','Blue','Gray','Red','Green','Pink'],
                    'JBL Charge 6'    => ['Black','Blue','Grey','Red'],
                    'JBL Xtreme 5'    => ['Black','Blue','Squad'],
                    'JBL Pulse 5'     => ['Black'],
                    'JBL Boombox 3'   => ['Black','Squad'],
                    'JBL Boombox 4'   => ['Black','Squad'],
                    'JBL PartyBox 130'=> ['Black'],

                    // Cotodama
                     'Cotodama Lyric Speaker' => ['Moon White','Black','Silver Military','OakWood'],

                ]],
            ],

            'Kamera' => [
                'Tipe'  => ['type'=>'dropdown','options'=>['Mirrorless','DSLR','Action','Compact','Instan']],
                'Warna' => ['type'=>'dropdown','options'=>['Black','Silver','White','Red']],
            ],
        ];

        return isset($config[$kategori]) ? $config[$kategori] : [
            'Tipe'  => ['type'=>'text'],
            'Warna' => ['type'=>'dropdown','options'=>['Black','White','Silver','Blue']],
        ];
    }

    public function get_option($barang_id)
    {
        return $this->db
            ->where('barang_id', $barang_id)
            ->order_by('id', 'ASC')
            ->get($this->table)
            ->result();
    }

    public function get_by_barang($barang_id)
    {
        return $this->get_option($barang_id);
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function delete_by_barang($barang_id)
    {
        return $this->db->where('barang_id', $barang_id)->delete($this->table);
    }

    public function count_by_barang($barang_id)
    {
        return $this->db->where('barang_id', $barang_id)->count_all_results($this->table);
    }
}