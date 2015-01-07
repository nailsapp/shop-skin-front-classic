<div class="row cover sale">
    <div class="col-xs-12">
        <?php

            if (!empty($sale->cover_id)) {

                $url    = cdn_scale($sale->cover_id, 1000, 500);
                $style  = 'style="background-image:url(' . $url . ');background-size:cover;"';

            } else {

                $style = '';
            }

            echo '<div class="background sale" ' . $style . '>';
                echo '<div class="overlay">';
                    echo '<h2>' . $sale->label . '</h2>';
                echo '</div>';
            echo '</div>';

            // --------------------------------------------------------------------------

            //  Prepare the breadcrumbs
            $crumbs = array();

            $crumbs[]   = array(
                'id'    => NULL,
                'label' => 'Sales',
                'url'   => app_setting('page_sale_listing', 'shop') ? $shop_url . 'sale' : NULL
            );

            $crumbs[]   = array(
                'id'    => $sale->id,
                'label' => $sale->label,
                'url'   => $sale->url
            );

            $view = $skin_front->path . 'views/front/_components/browse_breadcrumb';
            $data = array('crumbs' => $crumbs, 'active_id' => $sale->id);
            $this->load->view($view, $data);

            // --------------------------------------------------------------------------

            if (trim(strip_tags($sale->description))) {

                echo '<div class="description">';
                    echo $sale->description;
                echo '</div>';
            }

        ?>
    </div>
</div>