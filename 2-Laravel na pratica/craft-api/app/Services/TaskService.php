<?php
namespace App\Services;

use App\Exceptions\ApiException;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Task;
use DateTime;

class TaskService{
    public function list(int $perPage = 10):LengthAwarePaginator{
        return Task::query()
            ->orderByDesc('id')
            ->paginate($perPage);
    }

    public function create(array $data):Task {
        return Task::create([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'done' => $data['done'] ?? false,
            'finish' => $data['finish'] ?? null,
        ]);
    }

    public function findOrFail(int $id) {
        $task = Task::find($id);

        if (!$task){
            throw new ApiException(
                'TASK_NOT_FOUND',
                'Task não encontrada.',
                404,
                ['id' => $id]
            );
        }

        return $task;
    }

    public function update(int $id, array $data) {
        $task = $this->findOrFail($id);
        $task->fill($data);
        $task->save();

        return $task;
    }

    public function delete(int $id) {
        $task = $this->findOrFail($id);
        $task->delete();
    }
}
?>
