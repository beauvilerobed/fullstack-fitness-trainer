import VideoPlayer from '../VideoPlayer.js'
import workoutsAndTimeStamp from '../workoutsAndTimeStampsInSeconds.js'

class ResistancebandVideoController extends React.Component {

    render() {

        return (

            React.createElement(VideoPlayer, {
                classname: "ResistancebandVideo",
                videourl: "https://youtu.be/eQjxykBimEI",
                value: workoutsAndTimeStamp[0].resistancebandworkouts

            })

        );
    }
}

export default ResistancebandVideoController
