import VideoPlayer from '../VideoPlayer.js'
import workoutsAndTimeStamp from '../workoutsAndTimeStampsInSeconds.js'

class BodyWeightVideoController extends React.Component {


    render() {

        return (

            React.createElement(VideoPlayer, {
                classname: "BodyWeightVideo",
                videourl: "https://youtu.be/oB0D3FgDfvQ",
                value: workoutsAndTimeStamp[0].bodyWeightworkouts

            })

        );
    }
}

export default BodyWeightVideoController
