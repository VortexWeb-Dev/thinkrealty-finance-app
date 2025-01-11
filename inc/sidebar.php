<!-- sidebar.php -->
<nav id="sidebar" class="d-none d-md-block">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <div class="sidebar-header text-center pt-2">
                <h3 class="mb-0">Aghali</h3>
                <hr class="mt-0">
            </div>
            <?php
            $sidebar_items = [
                ['label' => "Dashboard", 'url' => 'index.php'],
                ['label' => "Double Entry Bookkeeping", 'url' => 'double-entry-bookkeeping.php'],
                ['label' => "Voucher Systems", 'url' => 'voucher-systems.php'],
                ['label' => "Income Statement", 'url' => 'income-statement.php'],
            ];
            $page_url = basename($_SERVER['REQUEST_URI']);

            foreach ($sidebar_items as $item) {
                $active_class = $page_url == $item['url'] ? 'active' : '';
                echo "<li class='nav-item mb-1'>
                        <a class='nav-link $active_class' href='{$item['url']}'>{$item['label']}</a>
                      </li>";
            }
            ?>
        </ul>
    </div>
</nav>