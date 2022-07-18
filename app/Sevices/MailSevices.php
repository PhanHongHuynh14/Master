use Illuminate\Support\Facades\Mail;

public function sendUserProfile($user)
{
    Mail::to(your_email)->send(new InformUserProfile($user));
}
