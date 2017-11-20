<link href="/css/table.css" rel="stylesheet" type="text/css" media="all" />
<div class="container-fluid">
<table id="total votes" class="table table-hover text-centered" >
    <thead class="thead-inverse">
    <b><tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('price') ?></th>
        <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </b>
    </thead>
    <tbody>
    <?php foreach ($carts as $cart): ?>
    <tr>
        <td><?= $this->Number->format($cart->id) ?></td>
        <td><?= $cart->has('user') ? $this->Html->link($cart->user->id, ['controller' => 'Users', 'action' => 'view', $cart->user->id]) : '' ?></td>
        <td><?= $cart->has('product') ? $this->Html->link($cart->product->name, ['controller' => 'Products', 'action' => 'view', $cart->product->id]) : '' ?></td>
        <td><?= $this->Number->format($cart->price) ?></td>
        <td><?= $this->Number->format($cart->quantity) ?></td>
        <td><?= h($cart->created) ?></td>
        <td><?= h($cart->modified) ?></td>
        <td><?= h($cart->status) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $cart->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cart->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->id)]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tr>
    </tbody>
</table>
<center><div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
</center>
</div>