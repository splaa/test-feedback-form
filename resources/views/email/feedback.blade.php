<h1>Форма обратной связи</h1>

<p><strong>Имя:</strong> {{ $feedback->user->name }}</p>
<p><strong>Почта:</strong> {{ $feedback->user->name }}</p>
<p><strong>Сообщение:</strong> {{ $feedback->message }}</p>
<p><strong>Дата создания:</strong> {{ $feedback->created_at->format('Y-m-d H:i:s') }}</p>
