import VideoPlayer from '../VideoPlayer.js'
import workoutsAndTimeStamp from '../workoutsAndTimeStampsInSeconds.js'

class WeightsVideoController extends React.Component {

    render() {

        return (

            React.createElement(VideoPlayer, {
                classname: "WeightsVideo",
                videourl: "https://youtu.be/TQD6lp8Lxp4",
                value: workoutsAndTimeStamp[0].weightsworkouts

            })

        );
    }
}
export default WeightsVideoController
