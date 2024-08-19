<?php
  
namespace App\Http\Resources;
  
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
  
class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array

     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'user_email' => $this->user_email,
            'company_name' => $this->company_name,
            'full_name' => $this->full_name,
            'creation_date' => $this->creation_date,
            'user_type' => $this->user_type,
            'last_update_date' => $this->last_update_date,
            // 'PasswordReset' => $this->PasswordReset,
            // 'created_at' => $this->created_at->format('d/m/Y'),
            // 'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
