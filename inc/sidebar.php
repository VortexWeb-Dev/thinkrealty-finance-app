<!-- sidebar.php -->
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <h1 class="text-center pt-2">Think Realty</h1>
            <hr>
            <?php
            $sidebar_items = [
                ['label' => "Dashboard", 'url' => 'index.php'],
                ['label' => "Double Entry Bookkeeping", 'url' => 'double-entry-bookkeeping.php'],
                ['label' => "Voucher Systems", 'url' => 'voucher-systems.php'],
                ['label' => "Chart of Accounts", 'url' => 'chart-of-accounts.php'],
                ['label' => "Ledgers", 'url' => 'ledgers.php'],
                ['label' => "Trial Balance", 'url' => 'trial-balance.php'],
                ['label' => "Income Statement", 'url' => 'income-statement.php'],
                ['label' => "Balance Sheet", 'url' => 'balance-sheet.php'],
                ['label' => "Debtors & Creditors Ageing", 'url' => 'debtors-creditors-ageing.php'],
                ['label' => "Cash Flow Statements", 'url' => 'cash-flow-statements.php'],
                ['label' => "Advanced Reporting", 'url' => 'advanced-reporting.php'],
                ['label' => "Analytics", 'url' => 'analytics.php'],
            ];
            $page_url = basename($_SERVER['REQUEST_URI']);

            foreach ($sidebar_items as $item) {
                $active_class = $page_url == $item['url'] ? 'active' : '';
                echo "<li class='nav-item'>
                        <a class='nav-link $active_class' href='{$item['url']}'>{$item['label']}</a>
                      </li>";
            }
            ?>
        </ul>
    </div>
</nav>
