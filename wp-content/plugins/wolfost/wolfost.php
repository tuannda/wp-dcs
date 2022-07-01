<?php
/**
 * Plugin Name: Generate Posts
 * Description: Create Post Demo
 * Version: 1.0.0
 * Author: TuanNDA
 * Author Uri: https://aioneto.cyou
 * Text Domain: base
 */

require_once('vendor/autoload.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

class Wolfost
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'adminMenu'));
    }

    public function adminMenu()
    {
        add_submenu_page('tools.php', 'Post Demo', 'Post Demo', 'manage_options', 'wolfost_demo', array(
            $this,
            'adminLayout'
        ));
    }

    public function adminLayout()
    {
        if (isset($_POST['submit-post'])) {
            $catId = $_POST['cat_id'] ?: '';
            if ($catId > 0) {
                $this->insertPosts($catId);
            }
        }

        if (isset($_POST['submit-category'])) {
            $this->insertCategories();
        }
        ?>
        <div class="wrap">
            <h2><?php _e('Create Post demo', 'base') ?></h2>
            <form id="base_post_demo" method="post">
                <?php wp_dropdown_categories(array(
                    'hide_empty' => 0,
                    'name' => 'cat_id',
                    'id' => 'categories',
                    'hierarchical' => true,
                    'show_option_none' => __('None'),
                )); ?>
                <input type="submit" value="Create Post demo" name="submit-post" class="button button-primary"/>
            </form>

            <h2><?php _e('Create Category demo', 'base') ?></h2>
            <form id="base_category_demo" method="post">
                <?php wp_dropdown_categories(array(
                    'hide_empty' => 0,
                    'name' => 'parent',
                    'id' => 'parent',
                    'hierarchical' => true,
                    'show_option_none' => __('None'),
                )); ?>
                <input type="submit" value="Create Category demo" name="submit-category" class="button button-primary"/>
            </form>
        </div>
        <?php
    }

    public function insertCategories()
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = new Faker\Generator();
            $faker->addProvider(new Faker\Provider\en_US\Person($faker));
            $faker->addProvider(new Faker\Provider\en_US\Address($faker));
            $faker->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
            $faker->addProvider(new Faker\Provider\en_US\Company($faker));
            $faker->addProvider(new Faker\Provider\Lorem($faker));
            $faker->addProvider(new Faker\Provider\Internet($faker));
            $parent = $_POST['parent'] ?: '';
            wp_insert_category([
                'taxonomy' => 'category',
                'cat_name' => ucfirst($faker->words(3, true)),
                'category_description' => $faker->text(140),
                'category_parent' => $parent,
            ]);
        }
    }

    public function insertPosts($cat_id)
    {
        $images = [
            'photo-1432888622747-4eb9a8efeb07.jpeg',
            'photo-1454944338482-a69bb95894af.jpeg',
            'photo-1455853828816-0c301a011711.jpeg',
            'photo-1456926631375-92c8ce872def.jpeg',
            'photo-1472393365320-db77a5abbecc.jpeg',
            'photo-1481070555726-e2fe8357725c.jpeg',
            'photo-1496412705862-e0088f16f791.jpeg',
            'photo-1501959915551-4e8d30928317.jpeg',
            'photo-1504384308090-c894fdcc538d.jpeg',
            'photo-1505576633757-0ac1084af824.jpeg',
            'photo-1506459225024-1428097a7e18.jpeg',
            'photo-1509365465985-25d11c17e812.jpeg',
            'photo-1512621776951-a57141f2eefd.jpeg',
            'photo-1516100882582-96c3a05fe590.jpeg',
            'photo-1518779578993-ec3579fee39f.jpeg',
            'photo-1524222835726-8e7d453fa83c.jpeg',
            'photo-1525351484163-7529414344d8.jpeg',
            'photo-1532939624-3af1308db9a5.jpeg',
            'photo-1539136788836-5699e78bfc75.jpeg',
            'photo-1540189549336-e6e99c3679fe.jpeg',
            'photo-1541795795328-f073b763494e.jpeg',
            'photo-1542838132-92c53300491e.jpeg',
            'photo-1543339308-43e59d6b73a6.jpeg',
            'photo-1547410295-8896a496c27a.jpeg',
            'photo-1548940740-204726a19be3.jpeg',
            'photo-1553949815-6bbea89fb801.jpeg',
            'photo-1555243896-c709bfa0b564.jpeg',
            'photo-1555939594-58d7cb561ad1.jpeg',
            'photo-1556040220-4096d522378d.jpeg',
            'photo-1559508551-44bff1de756b.jpeg',
            'photo-1559742811-822873691df8.jpeg',
            'photo-1560684352-8497838a2229.jpeg',
            'photo-1563379926898-05f4575a45d8.jpeg',
            'photo-1565299585323-38d6b0865b47.jpeg',
            'photo-1565299624946-b28f40a0ae38.jpeg',
            'photo-1565958011703-44f9829ba187.jpeg',
            'photo-1567620905732-2d1ec7ab7445.jpeg',
            'photo-1567769541715-8c71fe49fd43.jpeg',
            'photo-1569718212165-3a8278d5f624.jpeg',
            'photo-1572449043416-55f4685c9bb7.jpeg',
            'photo-1573739711422-68a9d0aa7d6b.jpeg',
            'photo-1574484184081-afea8a62f9c0.jpeg',
            'photo-1576021182211-9ea8dced3690.jpeg',
            'photo-1577234286642-fc512a5f8f11.jpeg',
            'photo-1578565856150-f0c9d8d2fe6b.jpeg',
            'photo-1582131503261-fca1d1c0589f.jpeg',
            'photo-1594212699903-ec8a3eca50f5.jpeg',
            'photo-1594627882045-57465104050f.jpeg',
            'photo-1600607687126-8a3414349a51.jpeg',
            'photo-1600803907087-f56d462fd26b.jpeg',
            'photo-1601888238810-edcf454894b2.jpeg',
            'photo-1604014237256-11d475e2a2d8.jpeg',
            'photo-1605475161596-c8ded579e67a.jpeg',
            'photo-1606066889831-35faf6fa6ff6.jpeg',
            'photo-1606149059549-6042addafc5a.jpeg',
            'photo-1609879938030-31acdeded104.jpeg',
            'photo-1610440042657-612c34d95e9f.jpeg',
            'photo-1615874959474-d609969a20ed.jpeg',
            'photo-1615875388242-46b822b09cda.jpeg',
            'photo-1615876234886-fd9a39fda97f.jpeg',
            'photo-1616048056617-93b94a339009.jpeg',
            'photo-1616137303871-05ce745f9cdb.jpeg',
            'photo-1616137422495-1e9e46e2aa77.jpeg',
            'photo-1616486338812-3dadae4b4ace.jpeg',
            'photo-1616486701797-0f33f61038ec.jpeg',
            'photo-1616593871468-2a9452218369.jpeg',
            'photo-1649028179325-0c7a1aa9cf65.jpeg',
            'photo-1652169882811-986ae8a462eb.jpeg',
            'photo-1652283321518-f7e460282f72.jpeg',
            'photo-1652361561822-b2aa3f30416a.jpeg',
            'photo-1652621475539-06e653b25c4d.jpeg',
            'photo-1652766540048-de0a878a3266.jpeg',
            'photo-1652781038874-5be41002d0c4.jpeg',
            'photo-1652862730784-bb2a6e862514.jpeg',
            'photo-1652904869195-8ee1b5f7653a.jpeg',
            'photo-1652972850590-4ccf8a99cf7f.jpeg',
            'photo-1652986708172-935f37f52fef.jpeg',
            'photo-1653022577567-622cbc7ef4d3.jpeg',
            'photo-1653115881802-5678bcc4db31.jpeg',
            'photo-1653194512065-ced623ac3cfc.jpeg',
            'photo-1653226166190-442adb1b1691.jpeg',
            'photo-1653238317435-3210d1dc38c3.jpeg',
            'photo-1653286015985-d4857eac5679.jpeg',
            'photo-1653389151473-d1f6a29216d5.jpeg',
            'photo-1653559178437-94889263fb39.jpeg',
            'photo-1653611540493-b3a896319fbf.jpeg',
            'photo-1653656929996-1427c143cad0.jpeg',
            'photo-1653717672421-ea07d5496ae2.jpeg',
            'photo-1653843757512-60d0db287550.jpeg',
            'photo-1654013147268-8c9185c941ae.jpeg',
            'photo-1654056025914-5b18af3880d3.jpeg',
            'photo-1654114196046-612d5b5e7038.jpeg',
            'photo-1654176154397-3133364f22e6.jpeg',
            'photo-1654187787970-2fa710e861cd.jpeg',
            'photo-1654413973499-e2bb41d4dffc.jpeg',
            'photo-1654720481565-da499168f9f5.jpeg',
            'photo-1654720947098-5ab1fffc7d43.jpeg',
            'photo-1654793903448-9c56df61a496.jpeg',
            'photo-1654890646075-263d8610bc50.jpeg',
            'photo-1654923064926-be7e64267a31.jpeg',
        ];
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $numbers = range(0, 99);
        shuffle($numbers);
        for ($i = 0; $i < 99; $i++) {
            $image_id = array_pop($numbers);
            $post = array();
            $post['post_category'] = array($cat_id);
            $post['post_status'] = 'publish';
            $post['post_type'] = 'post';
            $post['post_title'] = ucfirst($faker->words(10, true));
            $post['post_content'] = $faker->paragraphs(10, true);
            $post_id = wp_insert_post($post);
            $imageUrl = home_url('/demo/') . $images[$image_id];
            //Featured Image
            $image_name = basename(parse_url($imageUrl, PHP_URL_PATH));
            $upload_dir = wp_upload_dir();
            $image_data = file_get_contents($imageUrl);
            $unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
            $file_name = basename($unique_file_name);
            if (wp_mkdir_p($upload_dir['path'])) {
                $file = $upload_dir['path'] . '/' . $file_name;
            } else {
                $file = $upload_dir['basedir'] . '/' . $file_name;
            }
            file_put_contents($file, $image_data);
            $wp_filetype = wp_check_filetype($file_name, null);
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title' => sanitize_file_name($file_name),
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment($attachment, $file);
            $attach_data = wp_generate_attachment_metadata($attach_id, $file);
            wp_update_attachment_metadata($attach_id, $attach_data);
            set_post_thumbnail($post_id, $attach_id);
        }
    }
}

new Wolfost();
