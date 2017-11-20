
<link href="/css/table.css" rel="stylesheet" type="text/css" media="all" />
<div class="container-fluid">
    <table id="total votes" class="table table-hover text-centered" >
        <thead class="thead-inverse">
        <b><tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('password') ?></th>
            <th scope="col"><?= $this->Paginator->sort('image') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            <th scope="col"><?= $this->Paginator->sort('activation_key') ?></th>
            <th scope="col"><?= $this->Paginator->sort('is_admin') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </b>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->password) ?></td>
            <td><?= h($user->image) ?></td>
            <td><?= $this->Number->format($user->status) ?></td>
            <td><?= h($user->activation_key) ?></td>
            <td><?= $this->Number->format($user->is_admin) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
