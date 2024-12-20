<?php
function get_title($page_url) {
    $titles = array(
        'ledgers.php' => 'Ledgers',
        'advanced-reporting.php' => 'Advanced Reporting',
        'analytics.php' => 'Analytics',
        'balance-sheet.php' => 'Balance Sheet',
        'cash-flow-statements.php' => 'Cash Flow Statements',
        'chart-of-accounts.php' => 'Chart of Accounts',
        'debtors-creditors-ageing.php' => 'Debtors & Creditors Ageing',
        'double-entry-bookkeeping.php' => 'Double Entry Bookkeeping',
        'income-statement.php' => 'Income Statement',
        'trial-balance.php' => 'Trial Balance',
        'voucher-systems.php' => 'Voucher Systems',
        'index.php' => 'Dashboard',
        'add-voucher.php' => 'Add Voucher',
    );
    return isset($titles[$page_url]) ? $titles[$page_url] : 'Finance Module';
}
?>