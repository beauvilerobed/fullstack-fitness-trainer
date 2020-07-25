import VideoPlayer from '../VideoPlayer.js'
import workoutsAndTimeStamp from '../workoutsAndTimeStampsInSeconds.js'

class CardioVideoController extends React.Component {

    render() {

        return (

            React.createElement(VideoPlayer, {
                classname: "CardioVideo",
                videourl: "https://youtu.be/y5AQcYE0fz0",
                value: workoutsAndTimeStamp[0].cardioworkouts

            })

        );
    }
}

export default CardioVideoController
