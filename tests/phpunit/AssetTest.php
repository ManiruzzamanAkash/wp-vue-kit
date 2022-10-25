<?php

namespace Akash\WpVueKit\Tests;

/**
 * Assets class test.
 *
 * @since 0.0.1
 */
class AssetTest extends \WP_UnitTestCase {

    /**
     * Asset class instance.
     *
     * @var \Akash\WpVueKit\Asset()
     */
    public $asset;

    /**
     * Setup test environment.
     */
    protected function setUp() : void {
        $this->asset = new \Akash\WpVueKit\Asset();
    }

    public function test_get_router_base_url() {
        $admin_page_url1 = 'http://host.com/folder/wp-admin/admin.php?page=wp-vue-kit';
        $admin_page_url2 = 'http://host.com/wp-admin/admin.php?page=wp-vue-kit';

        $this->assertEquals(
            $this->asset->get_router_base_url( $admin_page_url1 ),
            'folder/wp-admin/admin.php?page=wp-vue-kit#',
        );

        $this->assertEquals(
            $this->asset->get_router_base_url( $admin_page_url2 ),
            'wp-admin/admin.php?page=wp-vue-kit#'
        );
    }
}
