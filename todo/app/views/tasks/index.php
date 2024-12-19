<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/style.css">
    <title>Liste des tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h1>Liste des tâches</h1>
        <a href="/create" class="btn btn-primary mb-3">Ajouter une tâche</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $task['id'] ?></td>
                        <td><?= htmlspecialchars($task['title']) ?></td>
                        <td>
                        <span class="status <?= $task['is_completed'] ? 'completed' : 'in-progress' ?>">
                            <?= $task['is_completed'] ? 'Terminée' :'En cours' ?></td>
                        </span>
                </td>
                        <td>
                            <?php if (!$task['is_completed']): ?>
                                <form method="POST" action="/complete">
                                    <input type="hidden" name="id" value="<?=$task['id'] ?>">
                                    <button type="submit" class="btn btn-success">Marquer comme terminée</button>
                                </form>
                            <?php endif; ?>
                            <form method="POST" action="/delete" class="mt-2">
                                <input type="hidden" name="id" value="<?=$task['id'] ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
