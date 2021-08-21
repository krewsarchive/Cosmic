<?php
namespace Cosmic\App\Controllers\Ajax;

use Cosmic\App\Models\Community;
use Cosmic\App\Models\Permission;
use Cosmic\System\LocaleService;

class Report
{
    public function feed()
    {
        $validate = request()->validator->validate([
            'itemId'   => 'required|numeric'
        ]);

        if(!$validate->isSuccess()) {
            exit;
        }

        $itemId = input()->post('itemId')->value;

        $item = Community::getFeedsByFeedId($itemId);
        if ($item) {
            if(Permission::exists('housekeeping_moderation_tools', request()->player->rank)) {
                Community::deleteFeedById($itemId);
                \App\Models\Report::remove($itemId, 'feed');

                response()->json(['status' => 'success', 'message' => LocaleService::get('core/notification/invisible')]);
            }

            $report = \App\Models\Report::getByItemId($itemId, 'feed');

            if($report != null) {
                response()->json(["status" => "success", "message" => LocaleService::get('core/notification/staff_received')]);
            }

            \App\Models\Report::insert($itemId, 'feed', $item->from_user_id, request()->player->id);
            response()->json(["status" => "success", "message" => LocaleService::get('core/notification/staff_received')]);
        }
    }

    public function post()
    {
        $validate = request()->validator->validate([
            'itemId'   => 'required|numeric'
        ]);
      
        if(!$validate->isSuccess()) {
            exit;
        }
      
        \App\Controllers\Community\Forum::report(input()->post('itemId')->value);
    }
}