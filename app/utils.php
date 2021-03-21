<?php

function checkQueryString($model, $query)
{
    $newQuery = [];
    foreach ($query as $key => $value) {
        if ($key != 'page' && $key != 'limit') {
            $newQuery[$key] = $value;
        }

    }
    return $model::where($newQuery);
}

function listInitOptions($model, $query)
{
    if (isset($query['limit'])) {
        return $model->paginate($query['limit']);
    } else {
        return $model->get();
    }
}
