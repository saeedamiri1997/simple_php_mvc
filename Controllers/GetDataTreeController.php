<?php

require_once '../Models/TreeModel.php';

class TreeController
{
    public function getTreeData()
    {
        try {
            $treeModel = new TreeModel();
            $data = $treeModel->getTree();
            
            if (empty($data)) {
                $this->sendError('No data found', 404);
                return;
            }
            
            $this->sendResponse($data, 200);
        } catch (Exception $e) {
            $this->sendError('خطایی رخ داده است: ' . $e->getMessage(), 500);
        }
    }

    private function sendResponse($data, $statusCode = 200)
    {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode(['status' => 'success', 'data' => $data]);
    }

    private function sendError($message, $statusCode = 500)
    {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode(['status' => 'error', 'message' => $message]);
    }
}
