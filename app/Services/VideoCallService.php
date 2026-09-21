<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Support\Str;

class VideoCallService
{
    private string $jitsiDomain;

    public function __construct()
    {
        $this->jitsiDomain = config('hallobun.jitsi_domain', 'meet.jit.si');
    }

    /**
     * Generate nama room unik untuk booking
     */
    public function generateRoomName(Booking $booking): string
    {
        return 'hallobun-' . $booking->kode_booking . '-' . Str::random(6);
    }

    /**
     * Generate link meeting Jitsi
     */
    public function generateMeetingLink(string $roomName): string
    {
        return "https://{$this->jitsiDomain}/{$roomName}";
    }

    /**
     * Assign room meeting ke booking dan simpan
     */
    public function assignMeetingRoom(Booking $booking): Booking
    {
        if ($booking->meeting_room) {
            return $booking; // Sudah ada room
        }

        $roomName    = $this->generateRoomName($booking);
        $meetingLink = $this->generateMeetingLink($roomName);

        $booking->update([
            'meeting_room' => $roomName,
            'meeting_link' => $meetingLink,
        ]);

        return $booking->fresh();
    }

    /**
     * Generate embed config untuk Jitsi iframe
     */
    public function getJitsiConfig(Booking $booking): array
    {
        $user = auth()->user();

        return [
            'roomName'   => $booking->meeting_room,
            'domain'     => $this->jitsiDomain,
            'userInfo'   => [
                'displayName' => $user->name,
                'email'       => $user->email,
            ],
            'configOverwrite' => [
                'startWithAudioMuted' => false,
                'startWithVideoMuted' => false,
                'disableDeepLinking'  => true,
            ],
            'interfaceConfigOverwrite' => [
                'TOOLBAR_BUTTONS' => [
                    'microphone', 'camera', 'closedcaptions',
                    'desktop', 'fullscreen', 'fodeviceselection',
                    'hangup', 'chat', 'recording', 'sharedvideo',
                    'tileview', 'videobackgroundblur', 'raisehand',
                ],
                'APP_NAME' => 'Hallobun',
            ],
        ];
    }
}
