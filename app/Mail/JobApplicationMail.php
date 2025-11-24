<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class JobApplicationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public JobApplication $jobApplication
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $careerTitle = $this->jobApplication->career?->title ?? 'Position';

        return new Envelope(
            subject: 'New Job Application for '.$careerTitle,
            replyTo: [$this->jobApplication->email],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.job-application',
            with: [
                'jobApplication' => $this->jobApplication,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if ($this->jobApplication->cv_path && Storage::disk('private')->exists($this->jobApplication->cv_path)) {
            $attachments[] = Attachment::fromStorageDisk('private', $this->jobApplication->cv_path)
                ->as('CV_'.$this->jobApplication->name.'.pdf')
                ->withMime('application/pdf');
        }

        return $attachments;
    }
}
