import PauseOrPlayButton from './PauseOrPlayButton.js'
import workoutsAndTimeStamp from './workoutsAndTimeStampsInSeconds.js'

class VideoPlayer extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            'isVideoPlaying': false,
        };
    }

    playVideo() {
        console.log({
            'isVideoPlaying': true
        });
        this.setState({
            'isVideoPlaying': true
        })
    }

    pauseVideo() {
        // Pause as well
        this.refs.vidRef.getInternalPlayer().pauseVideo()
        this.setState({
            'isVideoPlaying': false
        })
    }

    playYoutubeTimeStamp(seconds) {
        //Method for Youtube Timestamp
        return () => {
            this.refs.vidRef.seekTo(seconds)
            this.setState({
                'isVideoPlaying': true
            })
        };
    }


    render() {

        const workoutsAndTimesInSeconds = this.props.value

        return (

            React.createElement("div", {
                    class: this.props.classname
                },
                React.createElement(ReactPlayer, {
                    class: "edit_video",
                    url: this.props.videourl,
                    width: "100%",
                    pip: true,
                    ref: "vidRef",
                    controls: true,
                    playing: this.state.isVideoPlaying
                }),

                React.createElement("div", null,


                    React.createElement(PauseOrPlayButton, {
                        pauseOrPlay: this.playVideo.bind(this),
                        name: "Play"
                    }),

                    React.createElement(PauseOrPlayButton, {
                        pauseOrPlay: this.pauseVideo.bind(this),
                        name: "Pause!"
                    }),

                    React.createElement("div", null, workoutsAndTimesInSeconds.map((workoutsAndTimesInSeconds, index) => {
                        return React.createElement("button", {
                            class: "btn btn-primary btn-md",
                            onClick: this.playYoutubeTimeStamp(workoutsAndTimesInSeconds.seconds)
                        }, workoutsAndTimesInSeconds.workoutname);
                    }))
                )
            )

        );
    }
}

export default VideoPlayer
