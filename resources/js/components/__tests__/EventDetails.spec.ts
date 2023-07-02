import { mount } from "@vue/test-utils";
import EventDetails from "../EventDetails.vue";

describe("EventDetails", () => {
    it("renders event details correctly", () => {
        const event = {
            id: "1",
            title: "Test Event",
            description: "This is a test event.",
            start_date: "2023-07-02T00:00:00Z",
        };
        const wrapper = mount(EventDetails, {
            props: {
                event,
            },
        });

        expect(wrapper.text()).toContain(event.title);
        expect(wrapper.text()).toContain(event.description);
    });
});
